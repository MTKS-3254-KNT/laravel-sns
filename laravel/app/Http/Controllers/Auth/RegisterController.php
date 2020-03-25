<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    protected function validator(array $data)
    // ユーザー情報のバリデーションの定義を行なっている。
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'alpha_num', 'min:3', 'max:16', 'unique:users'],
            //  ['unique:users,name'] カラム名とリクエスト名が違う場合は👈
            // リクエスト名 => 名前は必須、文字列、英数字であること、3文字以上、16文字以下、他のユーザー名重複していないこと
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // リクエスト名 => アドレスは必須、文字列、メールアドレス形式、文字数制限、重複していないこと
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // リクエスト名 => パスワードは必須、文字列、最低8文字、password_confirmedと同じ内容であること
            // 項目名_confirmed また、ユーザー認証を使う場合でもパスワードのバリテーションは通常時に使うので記述する必要がある。
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
