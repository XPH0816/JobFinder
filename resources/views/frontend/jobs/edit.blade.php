@extends('layouts.main')

@section('content')
    <div style="height: 94px;"></div>

    <div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
        <div class="container text-center">
            <h1 class="mb-0" style="    color: #fff;
    font-size: 1.5rem;">Edit the Job: {{ $job->title }}</h1>
            <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a>
                </span> <span><span class="sep m-0"> ></span> Single job</span></p>
        </div>
    </div>

    <div class="site-section bg-light">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">


                    <form action="{{ route('job.update', [$job->id]) }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>Update a job</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="title" value="{{ $job->title }}" class="form-control">
                                    @if ($errors->has('title'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('title') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="position">Position:</label>
                                    <input type="text" name="position" value="{{ $job->position }}" class="form-control">
                                    @if ($errors->has('position'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('position') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="experience">Year of experience:</label>
                                    <input type="text" name="experience"
                                        class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"
                                        value="{{ $job->experience }}">
                                    @if ($errors->has('experience'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('experience') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mt-3">
                                    <label for="type">Job Type: </label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="fulltime"{{ $job->type == 'fulltime' ? 'selected' : '' }}>Fulltime
                                        </option>
                                        <option value="part time"{{ $job->type == 'part time' ? 'selected' : '' }}>Part
                                            Time
                                        </option>
                                        <option value="intern" {{ $job->type == 'intern' ? 'selected' : '' }}>Intern
                                        </option>
                                        <option value="remote"{{ $job->type == 'remote' ? 'selected' : '' }}>Remote
                                        </option>

                                    </select>
                                    @if ($errors->has('type'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('type') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="category">Category:</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach (App\Models\Category::all() as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ $cat->id == $job->category_id ? 'selected' : '' }}>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('category') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" value="{{ $job->address }}" class="form-control">
                                    @if ($errors->has('address'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('address') }}</p>
                                        </div>
                                    @endif

                                </div>

                                <div class="form-group mt-3">
                                    <label for="roles">Role:</label>
                                    <textarea name="roles" id="roles" style="height: 80px" class="form-control">{{ $job->roles }}</textarea>
                                    @if ($errors->has('roles'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('roles') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">Description:</label>
                                    <textarea name="description" id="description" style="height: 120px" class="form-control">{{ $job->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('description') }}</p>
                                        </div>
                                    @endif

                                </div>


                                <div class="form-group mt-3">
                                    <label for="number_of_vacancy">No of vacancy:</label>
                                    <input type="text" name="number_of_vacancy"
                                        class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"
                                        value="{{ $job->number_of_vacancy }}">
                                    @if ($errors->has('number_of_vacancy'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                        </span>
                                    @endif
                                </div>



                                <div class="form-group mt-3">
                                    <label for="type">Gender:</label>
                                    <select class="form-control" name="gender">
                                        <option value="any"{{ $job->gender == 'any' ? 'selected' : '' }}>Any</option>
                                        <option value="male"{{ $job->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female"{{ $job->gender == 'female' ? 'selected' : '' }}>Female
                                        </option>

                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="type">Salary/year:</label>
                                    <select class="form-control" name="salary">
                                        <option value="negotiable"{{ $job->salary == 'negotiable' ? 'selected' : '' }}>
                                            Negotiable</option>
                                        <option value="1500-3000"{{ $job->salary == 'RM 1500-3000' ? 'selected' : '' }}>
                                            1500-3000</option>
                                        <option value="3000-4000"{{ $job->salary == 'RM 3000-4000' ? 'selected' : '' }}>
                                            3000-4000</option>
                                        <option value="4000-5000"{{ $job->salary == 'RM 4000-5000' ? 'selected' : '' }}>
                                            4000-5000</option>
                                        <option value="5000-6000"{{ $job->salary == 'RM 5000-6000' ? 'selected' : '' }}>
                                            5000-6000</option>
                                        <option value="6000-7000"{{ $job->salary == 'RM 6000-7000' ? 'selected' : '' }}>
                                            6000-7000</option>
                                        <option value="7000-8000"{{ $job->salary == 'RM 7000-8000' ? 'selected' : '' }}>
                                            7000-8000</option>
                                        <option value="8000-9000"{{ $job->salary == 'RM 8000-9000' ? 'selected' : '' }}>
                                            8000-9000</option>
                                        <option value="10000-15000"{{ $job->salary == 'RM 10000-15000' ? 'selected' : '' }}>
                                            10000-15000</option>
                                        <option value="15000-20000"{{ $job->salary == 'RM 15000-20000' ? 'selected' : '' }}>
                                            15000-20000</option>
                                        <option value="200000+"{{ $job->salary == 'RM 200000+' ? 'selected' : '' }}>200000+
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group mt-3">
                                    <label for="status">Status: </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1"{{ $job->status == '1' ? 'selected' : '' }}>Live</option>
                                        <option value="0"{{ $job->status == '0' ? 'selected' : '' }}>Draft</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('status') }}</p>
                                        </div>
                                    @endif

                                </div>


                                <div class="form-group mt-3">
                                    <label for="last_date">Job apply last date:</label>
                                    <input type="date" name="last_date" value="{{ $job->last_date }}"
                                        class="form-control">
                                    @if ($errors->has('last_date'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('last_date') }}</p>
                                        </div>
                                    @endif

                                </div>

                                <div class="form-group mt-3">
                                    <button class=" btn btn-dark" type="submit">Update job</button>
                                </div>



                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
@endsection
