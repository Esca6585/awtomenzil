@extends('layouts.admin-layout')

@section('content')

            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fas fa-users" aria-hidden="true"></i> Sürüjiler</h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">Sürüjiler</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                <a href="{{ route('admin.drivers.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Sürüji goşmak</a>
                <a href="/admin/drivers/excel/export" class="btn btn-secondary float-left">Excel</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ady, Familiýasy we Atasynyň ady</th>
                    <th>Tabel Belgisi</th>
                    <th>Doglan güni we ýeri</th>
                    <th>Bilimi</th>
                    <th>Pasport belgisi, alynan senesi we ýeri</th>
                    <th>Telefon belgisi</th>
                    <th>Ýaşaýan salgysy</th>
                    <th>Suraty</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($drivers as $driver)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $driver->ady }} {{ $driver->familiyasy }} {{ $driver->atasynyn_ady }}</td>
                          <td>{{ $driver->tabel_belgisi }}</td>
                          <td>{{ $driver->doglan_guni }} <br> {{ $driver->doglan_yeri }}</td>
                          <td>{{ $driver->bilimi }}</td>
                          <td><b class="btn btn-success">{{ $driver->pasport_belgisi }}</b> <br> {{ $driver->pasport_alynan_wagty }} <br> {{ $driver->pasport_alynan_yeri }}</td>
                          <td>{{ $driver->telefon_belgisi }}</td>
                          <td>{{ $driver->yashayan_salgysy }}</td>
                          <td><img src="{{ asset($driver->suraty) }}" alt="{{ $driver->suraty }}" width="100px"></td>
                          <td>
                          
                              <form method="post" action="{{ route('admin.drivers.destroy', $driver->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                              
                                <a href="{{ route('admin.drivers.show', $driver->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                
                                <a href="{{ route('admin.drivers.edit', $driver->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                               
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
                    <th>Ady, Familiýasy we Atasynyň ady</th>
                    <th>Tabel Belgisi</th>
                    <th>Doglan güni we ýeri</th>
                    <th>Bilimi</th>
                    <th>Pasport belgisi, alynan wagty we ýeri</th>
                    <th>Telefon belgisi</th>
                    <th>Ýaşaýan salgysy</th>
                    <th>Suraty</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection