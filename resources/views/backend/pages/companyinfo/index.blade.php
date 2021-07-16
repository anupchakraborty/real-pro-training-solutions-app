@extends('backend.layouts.master')

@section('title')
    Admin | Real Pro Training Solutions Admin Dashboard
@endsection

@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="text-transform: capitalize;">{{ Auth::guard('admin')->user()->name }} Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class = "card">
                <div class="card-header">
                    <h3 class="card-title">Company Information</h3>
                    <p class="float-right mb-2">
                        @foreach($companyinfos as $companyinfo)
                            <a class="btn btn-primary text-white" href="{{ route('admin.companyinfo.edit',$companyinfo->id) }}">Edit Info</a>
                        @endforeach
                  </p>
                </div>
                <div class="card-body">
                    @foreach($companyinfos as $companyinfo)
                        <div class="company-info">
                            <div class="company-title">
                                <h3>Company Name</h3>
                                <hr>
                                <div class="comapny-details">
                                    <p>{{ $companyinfo->name }}</p>
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>Company Email</h3>
                                <hr/>
                                <div class="comapny-details">
                                    <p>{{ $companyinfo->email }}</p>
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>Company Address</h3>
                                <hr/>
                                <div class="comapny-details">
                                    <p>{{ $companyinfo->address }}</p>
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>Company Contact</h3>
                                <hr/>
                                <div class="comapny-details">
                                    <p>{{ $companyinfo->contact }}</p>
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>Company Logo</h3>
                                <hr/>
                                <div class="comapny-details">
                                    <img src="{{ asset('backend/img/'.$companyinfo->logo) }}" alt="" srcset="">
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
