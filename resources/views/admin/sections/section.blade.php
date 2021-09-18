@extends('layouts.admin-layout')

@section('content')


            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Bölümler</h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryjy paneli</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">Bölümler</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                <a href="{{ route('admin.sections.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Bölümi goşmak</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Bölümiň ady</th>
                    <th>Wezipeler <i class="fa fa-briefcase"></i></th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($sections as $section)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $section->name }}</td>
                          <td>
                            <a href="{{ route('admin.sectionsjobs.show', $section->id ) }}" class="btn btn-primary">Wezipeleri <i class="fa fa-briefcase"></i></a>
                          </td>
                              
                          <td>
                              <form method="post" action="{{ route('admin.sections.destroy', $section->id ) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                              
                               <a href="{{ route('admin.sections.show', $section->id ) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                <a href="{{ route('admin.sections.edit', $section->id ) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                
                        
                                
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
                    <th>Bölümiň ady</th>
                    <th>Wezipeler <i class="fa fa-briefcase"></i></th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection


