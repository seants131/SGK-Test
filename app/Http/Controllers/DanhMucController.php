<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;
class DanhMucController extends Controller
{
    public function index(Request $request)
    {
        $query = DanhMuc::with(['children'])
            ->whereNull('parent_id');
    
        // Tìm theo tên danh mục
        if ($request->filled('ten_danh_muc')) {
            $query->where('name', 'LIKE', '%' . $request->ten_danh_muc . '%');
        }
    
        // Tìm theo tên danh mục con
        if ($request->filled('ten_danh_muc_con')) {
            $query->whereHas('children', function ($childQuery) use ($request) {
                $childQuery->where('name', 'LIKE', '%' . $request->ten_danh_muc_con . '%');
            });
        }
    
        // Tìm theo ngày tạo
        if ($request->filled('ngay_tao')) {
            $query->whereDate('created_at', $request->ngay_tao); // Không cần Carbon ở đây
        }
        
        // Sắp xếp theo ngày tạo, phân trang
        $danhmucs = $query->orderBy('created_at', 'desc')->paginate(2);
    
        return view('admin.danhmucs.index', compact('danhmucs'));
    }
    

    public function create()
    {
        $danhmucs = DanhMuc::whereNull('parent_id')->get();
        return view('admin.danhmucs.create', compact('danhmucs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:danhmuc,id',
        ]);

        // Kiểm tra danh mục đã tồn tại
        $existingDanhMuc = DanhMuc::where('name', $request->name)->first();
        if ($existingDanhMuc) {
            return back()->with('error', 'Danh mục "' . $request->name . '" đã tồn tại.')->withInput();
        }

        // Tạo danh mục mới với thời gian cập nhật để đảm bảo lên đầu
        $danhmuc = DanhMuc::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'created_at' => now() // Cập nhật thời gian hiện tại để danh mục mới lên đầu
        ]);

        // Nếu là danh mục con, cập nhật thời gian của danh mục cha để đưa nó lên đầu
        if ($request->parent_id) {
            DanhMuc::where('id', $request->parent_id)->update(['created_at' => now()]);
        }

        return redirect()->route('admin.danhmucs.index')->with('success', 'Danh mục được thêm thành công.');
    }

    public function edit($id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        $danhmucs = DanhMuc::whereNull('parent_id')->get();
        return view('admin.danhmucs.edit', compact('danhmuc', 'danhmucs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:danhmuc,id',
        ]);

        $danhmuc = DanhMuc::findOrFail($id);
        $danhmuc->update($request->all());

        return redirect()->route('admin.danhmucs.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $danhmuc = DanhMuc::findOrFail($id);

        // Kiểm tra nếu danh mục có sách liên quan
        if ($danhmuc->books()->count() > 0) {
            return redirect()->route('admin.danhmucs.index')->with('error', 'Phải xóa các sách liên quan trước khi xóa danh mục.');
        }
        // Kiểm tra nếu danh mục có danh mục con
        if ($danhmuc->children()->count() > 0) {
            return redirect()->route('admin.danhmucs.index')->with('error', 'Không thể xóa danh mục này vì có danh mục con.');
        }
        // Xóa danh mục con (nếu cần)
        $danhmuc->children()->delete();
        // Xóa danh mục
        $danhmuc->delete();

        return redirect()->route('admin.danhmucs.index')->with('success', ' đã được xóa thành công.');
    }
}
