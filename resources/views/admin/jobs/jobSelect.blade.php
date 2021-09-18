@extends('layouts.admin-layout')

@section('content')


            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fa fa-briefcase" aria-hidden="true"></i> Wezipeler</h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryjy paneli</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">Wezipeler</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                <a href="{{ route('admin.jobs.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Wezipe goşmak</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Wezipäniň ady</th>
                    <th>Bölümi</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($jobs as $job)
                        <tr>
                          <td>{{ $job->id }}</td>
                          <td>{{ $job->name }}</td>
                          <td>
                            @if($job->parent)
                              {{ $job->parent->name }}
                            @else
                              <a href="{{ route('admin.sections.select', $job->id) }}">Wezipeler</a>
                            @endif
                          </td>
                              
                          <td>
                              <form method="post" action="{{ route('admin.jobs.destroy', $job->id ) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                              
                               <a href="{{ route('admin.jobs.show', $job->id ) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="{{ route('admin.jobs.edit', $job->id ) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                
                        
                                
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
                    <th>Wezipäniň ady</th>
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

