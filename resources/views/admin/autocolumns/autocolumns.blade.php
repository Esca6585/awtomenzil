@extends('layouts.admin-layout')

@section('content')


            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fa fa-columns" aria-hidden="true"></i>
                          @if(Auth::user()->autocolumn_id == 12345)
                            Awto Toplumlar
                          @else
                            Awto Toplum - {{ Auth::user()->autocolumn_id }}
                          @endif
                        </h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryjy paneli</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">
                          @if(Auth::user()->autocolumn_id == 12345)
                            Awto Toplumlar
                          @else
                            Awto Toplum - {{ Auth::user()->autocolumn_id }}
                          @endif
                        </li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                @if(Auth::user()->autocolumn_id != 12345)
                  <a href="{{ route('admin.autocolumn.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Awto Toplum - {{ Auth::user()->autocolumn_id }} goşmak</a>
                @endif
                  <a href="/admin/autocolumn/excel/export" class="btn btn-secondary float-left">Excel</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ady, Familiýasy we Atasynyň ady</th>
                    <th>Tabel Belgisi</th>
                    <th>Döwlet belgisi</th>
                    <th>Doglan güni we ýeri</th>
                    <th>Bilimi</th>
                    <th>Pasport belgisi, alynan wagty we ýeri</th>
                    <th>Telefon belgisi</th>
                    <th>Ýaşaýan salgysy</th>
                    <th>Suraty</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($autocolumns as $autocolumn)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $autocolumn->driver->ady }} {{ $autocolumn->driver->familiyasy }} {{ $autocolumn->driver->atasynyn_ady }}</td>
                          <td>{{ $autocolumn->driver->tabel_belgisi }}</td>
                          <td>{{ $autocolumn->car->awtoulagyn_kysymy }} <br> {{ $autocolumn->car->awtoulagyn_gornushi }} <br> {{ $autocolumn->car->awtoulogyn_shahsy_belgisi }}<br></td>
                          <td>{{ $autocolumn->driver->doglan_guni }} <br> {{ $autocolumn->driver->doglan_yeri }}</td>
                          <td>{{ $autocolumn->driver->bilimi }}</td>
                          <td>{{ $autocolumn->driver->pasport_belgisi }} <br> {{ $autocolumn->driver->pasport_alynan_yeri }}</td>
                          <td>{{ $autocolumn->driver->telefon_belgisi }}</td>
                          <td>{{ $autocolumn->driver->pasport_belgisi }}</td>
                          <td><img src="/{{ $autocolumn->driver->suraty }}" alt="{{ $autocolumn->driver->suraty }}" width="100px"></td>
                          <td>
                                
                              <form method="post" action="{{ route('admin.autocolumn.destroy', $autocolumn->id ) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                              
                               <a href="{{ route('admin.autocolumn.show', $autocolumn->id ) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>

                                @if(Auth::user()->autocolumn_id != 12345)
                                  <a href="{{ route('admin.autocolumn.edit', $autocolumn->id ) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                @endif
                        
                                @if(Auth::user()->autocolumn_id != 12345)
                                  @csrf
                                  @method('delete')

                                  <button type="submit" id="deleteBtn" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                @endif


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
                    <th>Döwlet belgisi</th>
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


