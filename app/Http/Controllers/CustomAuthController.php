<?php



namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admission;
use App\Models\Teacher;
use Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        /* echo 'Value Posted'; */
        $request->validate([
            'username' => 'required',
            /* Uniq EMail Only Meaning Only One Name Email is Allowed */
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
        ]);
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'You have registered successfuly');
        } else {
            return back()->with('fail', 'Something wrong');
        }
        /* return "registration"; */
    }

    public function loginUser(Request $request)
    {
        $request->validate([

            'username' => 'required',
            /* Uniq EMail Only Meaning Only One Name Email is Allowed */
            /* 'email' => 'required|email|unique:users', */
            'password' => 'required|min:5|max:12',
        ]);
        $user = User::where('name', '=', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                if ($user->usertype == 'student') {
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('loginName', $user->name);
                    return redirect('student-home');
                } else {
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('loginName', $user->name);
                    return redirect('admin-home');
                }
            } else {
                return back()->with('fail', 'Password not matches');
            }
        } else {
            return back()->with('fail', 'This username is not registered');
        }
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
        }

        return view("home.adminhome", compact('data'));
    }

    public function studentHome()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view("home.studenthome", compact('data'));
    }

    public function adminHome()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view("home.adminhome", compact('data'));
    }

    public function studentProfile()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }

        return view("student.student_profile", compact('data'));
    }

    public function updateProfile(User $user)
    {

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);



        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        return redirect('/student-profile');
    }



    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }

    public function Admissions()
    {
        $ad = Admission::all();
        return view('admin.admissions', ['ad' => $ad]);
        /* return view('posts.index', ['posts' => $posts]); */
    }

    public function admisionForm(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            /* 'phone' => 'required', */
        ]);





        $admission = new Admission();
        $admission->name = $request->name;
        $admission->email = $request->email;
        $admission->message = $request->message;
        $res = $admission->save();
        if ($res) {
            return back()->with('success', 'Message Sent Successfully');
        } else {
            return back()->with('fail', 'Something wrong');
        }
    }

    public function homedashboard()
    {
        return view("welcome");
    }

    public function addStudentForm()
    {
        return view('admin.add');
        /* return view('posts.index', ['posts' => $posts]); */
    }

    public function addStudent(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            /* 'phone' => 'required', */
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->usertype = 'student';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'Student Successfully Added');
        } else {
            return back()->with('fail', 'Something wrong');
        }



        /* return view('posts.index', ['posts' => $posts]); */
    }

    public function viewStudents()
    {
        $data = User::where('usertype', '=', 'student')->get();

        /* dd($data); */

        return view('admin.view-student', compact('data'));
        /* return view('posts.index', ['posts' => $posts]); */
    }

    public function deleteStudent(User $user)
    {
        $user->delete();

        return redirect('/view-student');
    }

    public function editStudentView(User $user)
    {
        return view('admin.student-edit', ['user' => $user]);
    }

    public function updateStudent(User $user)
    {



        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);



        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        return redirect('/view-student');
    }

    public function addTeacherForm()
    {
        return view('admin.add-teacher');
    }

    public function addTeacher(Request $request)
    {

        $file = $_FILES['image']['name'];



        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            /* 'phone' => 'required', */
        ]);

        $request->image->move(public_path('images'), $file);

        /* $imageName = time() . '.' . $request->image->extension(); */
        /* $imageName =  $request->image->getClientOriginalName(); */

        /* pathinfo($imgName4, PATHINFO_BASENAME) */

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->description = $request->description;
        $teacher->image = $file;

        $res = $teacher->save();
        if ($res) {
            return back()->with('success', 'Teacher Successfully Added');
        } else {
            return back()->with('fail', 'Something wrong');
        }



        /* return view('posts.index', ['posts' => $posts]); */
    }

    public function viewTeachers()
    {
        $data = User::where('usertype', '=', 'teacher')->get();
        $data = Teacher::all();

        return view('admin.view-teacher', compact('data'));
    }

    public function deleteTeacher(Teacher $teacher)
    {
        $teacher->delete();

        return redirect('/view-teacher');
    }

    public function editTeacherView(Teacher $teacher)
    {
        return view('admin.teacher-edit', ['teacher' => $teacher]);
    }

    public function updateTeacher(Teacher $teacher)
    {
        $file = $_FILES['image']['name'];

        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        request('image')->move(public_path('images'), $file);

        $teacher->update([
            'name' => request('name'),
            'description' => request('description'),
            'image' =>  $file,
        ]);

        return redirect('/view-teacher');
    }
}
