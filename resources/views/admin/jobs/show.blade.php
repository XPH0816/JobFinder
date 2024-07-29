@extends('../admin/layouts.app')



@section('content')
    <!--  Header BreadCrumb -->
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="material-icons">home</i>Home</a></li>

                <li class="breadcrumb-item active" aria-current="page">View job : {{ $job->title }} </li>
            </ol>
        </nav>
        <div class="create-item">
            <a href="/dashboard/jobs" class="theme-primary-btn btn btn-primary"><i
                    class="material-icons">arrow_back</i>&nbsp;Back to jobs</a>


        </div>
    </div>
    <!--  Header BreadCrumb -->


    <div class="card bg-white">
        <div class="card-body mt-1 mb-5">



            <div class="form-group row">
                <div class="col-md-2">Job Title</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->title }}" class="form-control">


                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Job Position</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->position }}" class="form-control">

                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Year of experience</div>
                <div class="col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $job->experience }}">


                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Job Type</div>
                <div class="col-md-4">
                    <select readonly class="form-control">
                        <option value="Fulltime"{{ $job->type == 'Fulltime' ? 'selected' : '' }}>Fulltime</option>
                        <option value="Partime"{{ $job->type == 'Partime' ? 'selected' : '' }}>Partime</option>
                        <option value="Remote"{{ $job->type == 'Remote' ? 'selected' : '' }}>Remote</option>

                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Category</div>
                <div class="col-md-4">
                    <select readonly id="category_id" class="form-control">
                        @foreach (App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $job->category_id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Address</div>
                <div class="col-md-4">
                    <input type="text" readonly value="{{ $job->address }}" class="form-control">

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Role</div>
                <div class="col-md-6">
                    <textarea readonly style="height: 140px" class="form-control">{{ $job->roles }}</textarea>


                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Description</div>
                <div class="col-md-6">
                    <textarea readonly style="height: 120px" class="form-control">{{ $job->description }}</textarea>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Nomber of vacancy</div>
                <div class="col-md-4">
                    <input type="text" readonly class="form-control" value="{{ $job->number_of_vacancy }}">

                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Gender</div>
                <div class="col-md-4">
                    <select class="form-control" readonly>
                        <option value="any"{{ $job->gender == 'any' ? 'selected' : '' }}>Any</option>
                        <option value="male"{{ $job->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female"{{ $job->gender == 'female' ? 'selected' : '' }}>Female</option>

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2">Salary/year</div>
                <div class="col-md-4">
                    {{-- <select class="form-control" readonly> --}}
                        {{-- <option value="negotiable" @selected($job->salary == 'Negotiable')>Negotiable</option> --}}
                        {{-- <option value="1500-3000" @selected($job->salary == 'RM 1500-3000')>1500-3000</option> --}}
                        {{-- <option value="3000-4000" @selected($job->salary == 'RM 3000-4000')>3000-4000</option> --}}
                        {{-- <option value="4000-5000" @selected($job->salary == 'RM 4000-5000')>4000-5000</option> --}}
                        {{-- <option value="5000-6000" @selected($job->salary == 'RM 5000-6000')>5000-6000</option> --}}
                        {{-- <option value="6000-7000" @selected($job->salary == 'RM 6000-7000')>6000-7000</option> --}}
                        {{-- <option value="7000-8000" @selected($job->salary == 'RM 7000-8000')>7000-8000</option> --}}
                        {{-- <option value="8000-9000" @selected($job->salary == 'RM 8000-9000')>8000-9000</option> --}}
                        {{-- <option value="10000-15000" @selected($job->salary == 'RM 10000-15000')>10000-15000</option> --}}
                        {{-- <option value="15000-20000" @selected($job->salary == 'RM 15000-20000')>15000-20000</option> --}}
                        {{-- <option value="200000+" @selected($job->salary == 'RM 200000+')>200000+</option> --}}
                    {{-- </select> --}}
                    <input type="number" name="salary" class="form-control" value="{{ $job->salary == 'Negotiable' ? '0' : substr($job->salary, 3) }}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-2">Status</div>
                <div class="col-md-4">
                    <select readonly id="status" class="form-control">
                        <option value="1"{{ $job->status == '1' ? 'selected' : '' }}>Live</option>
                        <option value="0"{{ $job->status == '0' ? 'selected' : '' }}>Draft</option>
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 ">Job apply last date</div>
                <div class="col-md-4">
                    <input type="date" readonly value="{{ $job->last_date }}" class="form-control">

                </div>
            </div>
            <div class="form-group pt-2 row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <a href="/dashboard/jobs" class="theme-primary-btn btn btn-success">Back to jobs</a>

                </div>
            </div>



        </div>
    </div>
@endsection
