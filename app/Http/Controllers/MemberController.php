<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class MemberController extends Controller
{
    public function index(){
        $all_member = Member::All();
        return view('member/index',[
            'member' => $all_member
        ]);
    }
    public function add(){
        return view('member/add');
    }
    public function insert(Request $req){
        $create = Member::create([
            'nama' => $req->nama,
            'alamat'=> $req->alamat,
        ]);
        return redirect('member');
    }
    public function delete($id) {
        Member::find($id)->delete();
        return redirect('member');
    }
    public function edit($id){
        $member = Member::find($id);
        return view('member/add', [
            'member' => $member
        ]);
    }

    public function update(Request $req){
        Member::where('id',$req->id)->update([
            'nama' => $req->nama,
            'alamat'=> $req->alamat,
        ]);
        return redirect('member');
    }

}
