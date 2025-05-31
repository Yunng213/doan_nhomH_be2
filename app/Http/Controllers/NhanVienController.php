<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;

class NhanVienController extends Controller
{
    public function index()
    {
        $nhanviens = NhanVien::all();
        return view('nhanvien.index', compact('nhanviens'));
    }

    public function create()
    {
        return view('nhanvien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'TenNV' => 'required',
            'ChucVu' => 'required',
            'NgayNhanViec' => 'required|date',
        ]);

        NhanVien::create($request->all());

        return redirect()->route('nhanvien.index')->with('success', 'Thêm nhân viên thành công');
    }

    public function edit($id)
    {
        $nhanvien = NhanVien::findOrFail($id);
        return view('nhanvien.edit', compact('nhanvien'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'TenNV' => 'required',
            'ChucVu' => 'required',
            'NgayNhanViec' => 'required|date',
        ]);

        $nhanvien = NhanVien::findOrFail($id);
        $nhanvien->update($request->all());

        return redirect()->route('nhanvien.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $nhanvien = NhanVien::findOrFail($id);
        $nhanvien->delete();

        return redirect()->route('nhanvien.index')->with('success', 'Xóa thành công');
    }
}
