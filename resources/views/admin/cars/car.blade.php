@extends('layouts.admin-layout')

@section('content')

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Ulag</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('admin.cars.store') }}" method="post">
              @csrf

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Awtoulagyň kysymy</label>
              <input type="text" class="form-control" placeholder="Awtoulagyň kysymy" name="awtoulagyn_kysymy">
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
            <label for="">Awtoulagyň görnüşi</label>
              <input type="text" class="form-control" placeholder="Awtoulagyň görnüşi" name="awtoulagyn_gornushi">
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Awtoulogyň şahsy belgisi</label>
              <input type="text" class="form-control" placeholder="Awtoulogyň şahsy belgisi" name="awtoulogyn_shahsy_belgisi">
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Çykan ýyly</label>
              <input type="text" class="form-control" placeholder="Çykan ýyly" name="cykan_yyly">
            </div>
          </div>
          
          <div class="col-6">
            <div class="form-group">
              <label for="">Win kody</label>
              <input type="text" class="form-control" placeholder="Win kody" name="win_kody">
            </div>
          </div>

            
          

        </div>
          
            
        </div>
        


        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
            
              <button type="submit" class="btn btn-success">Save</button>
            </form>
       
          <!-- save Input field store route -->
        
        </div>
    </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


            <div class="card card-primary">
              <div class="card-header text-right">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="card-title"><i class="fas fa-car" aria-hidden="true"></i> Ulaglar</h1>

                    </div>
                    <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dolandyryş paneli</a></li>
                        <li class="breadcrumb-item" style="color: #c0c0c0">Ulaglar</li>
                      </ol>
                    </div>
                  </div>
                </div><!-- /.container-fluid -->
              </section>
                <a href="{{ route('admin.cars.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Ulag goşmak</a>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                

                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Awtoulagyň kysymy</th>
                    <th>Awtoulagyň görnüşi</th>
                    <th>Awtoulogyň şahsy belgisi</th>
                    <th>Çykan ýyly</th>
                    <th>Win kody</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($cars as $car)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $car->awtoulagyn_kysymy }}</td>
                          <td>{{ $car->awtoulagyn_gornushi }}</td>
                          <td>{{ $car->awtoulogyn_shahsy_belgisi }}</td>
                          <td>{{ $car->cykan_yyly }}</td>
                          <td>{{ $car->win_kody }}</td>
                          <td>
                                
                              <form method="post" action="{{ route('admin.cars.destroy', $car->id) }}" onsubmit="return confirm('Are you sure you want to delete this category?');">
                              
                               <a href="{{ route('admin.cars.show', $car->id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                               
                                <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                               
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
                    <th>Awtoulagyň kysymy</th>
                    <th>Awtoulagyň görnüşi</th>
                    <th>Awtoulogyň şahsy belgisi</th>
                    <th>Çykan ýyly</th>
                    <th>Win kody</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>

           
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@endsection
