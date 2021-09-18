@extends('layouts.admin-layout')

@section('content')


            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fa fa-list-alt"></i> {{ $section->name }}niň <i class="fas fa-chevron-right"></i> <i class="fa fa-briefcase"></i> Wezipeleri</h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryjy paneli</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.sections.index') }}">Bölümler</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">{{ $section->name }}niň <i class="fas fa-chevron-right"></i> <i class="fa fa-briefcase"></i> Wezipeleri</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                <form action="{{ route('admin.sectionsjobs.create') }}" method="get">
                   
                  <input type="hidden" name="id" value="{{ $section->id }}">

                  <button class="btn btn-success"><i class="fa fa-plus"></i> {{ $section->name }}ne wezipe goşmak</button>
                </form>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>{{ $section->name }}niň Wezipeleriniň ady</th>
                    <th>Bölümi</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($sectionJobs as $sectionJob)
                        <tr>
                          <td>{{ $sectionJob->id }}</td>
                          <td>{{ $sectionJob->name }}</td>
                          <td>
                            <a href="{{ route('admin.sections.index') }}" class="btn btn-primary">{{ $section->name }} <i class="fa fa-list-alt"></i></a>
                          </td>
                          <td>
                              <form method="post" action="" onsubmit="return confirm('Siz pozmak isleýäňizmi ?', 'salam');">
                              
                               <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                
                        
                                
                                  @csrf
                                  @method('delete')

                                  <button type="submit" id="deleteBtn" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                
                        

                              </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>{{ $section->name }}niň Wezipeleriniň ady</th>
                    <th>Bölümi</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>

           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection


