<section class="content">
    <div class="row">
      <div class="bootstrap-table">
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <div class="row">
              <div class="col-md-12">
                  <div class="box-header">
                    <h3 class="box-title col-md-9">Jami dorilar</h3>
                    
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    @if (auth()->user()->id===1)
                    <a style="margin: 0 10px 10px 0" class="btn-block btn btn-success" href="{{route('drug.create')}}">Dori Qo'shish</a>
                    @endif
                    <form action="{{route('drugs.index')}}" method="get" class="mb-2">
                      <div class="input-group">
                        <input type="text" name="qq" class="form-control col-md-9" autocomplete="off" placeholder="Qidirish..."/>
                        <span class="input-group-btn">
                          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                      </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th  >Dori nomi</th>
                            <th>Kategoriya</th>
                            @if (auth()->user()->id===1)
                            <th class="col-md-2">Amallar</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($drugs as $drug)
                          
                          <tr>
                            {{-- <td><a href="{{route('patient.about',['id' => $patient->id,'user_id'=>auth()->user()->id])}}">2</a></td> --}}
                            
                            <td><a href="{{route('drug.about',['id'=>$drug->id])}}">{{$drug->name}}</a></td>
                            <td><a href="{{route('drug.about',['id'=>$drug->id])}}">{{$drug->category->name}}</a></td>
                            @if (auth()->user()->id===1)
                            <td>
                              <a style="margin-bottom: 5px"  class="btn btn-info btn-block " href="{{route('drug.edit',['id'=>$drug->id])}}"><i class="fa  fa-pencil"></i></a>
                              
                              
                                <form  action="{{ route('drug.destroy', $drug->id) }}" method="POST" onsubmit="return confirm('Dorini o\'chirishni xohlaysizmi?');">
                                    @csrf
                                    @method('DELETE')
                                    <button  type="submit" class="btn btn-danger btn-block  "><i class="fa fa-trash-o"></i></button>
                                </form>
                             
                                
                            </div>
                            @endif
                            
                            </tr> 
                            @endforeach
                            
                        </tfoot>
                      </table>
                    </div>
                    {{ $drugs->links() }}
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          
        </div>
      </div>
        
          <div class="col-md-3">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Eng ko'p tavsiya etilganlar</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  @foreach ($drugsx as $drug)
                  <li class="item">
                    <div class="product-img">
                      <img style="border-radius: 30%" src="https://images.pexels.com/photos/159211/headache-pain-pills-medication-159211.jpeg" alt="Product Image"/>
                    </div>
                    <div class="product-info">
                      <a href="{{route('drug.about',['id'=>$drug->id])}}" class="product-title">{{$drug->name}} <span class="label label-warning pull-right">{{$drug->total}} marta</span></a>
                      <span class="product-description">
                        Ilk qo'llanilgan kun: {{$drug->created_at->format('d-m-Y')}}
                      </span>
                    </div>
                  </li><!-- /.item -->
                  @endforeach
                  
                </ul>
              </div><!-- /.box-body -->
              
            </div><!-- /.box -->
          </div><!-- /.col -->
    </div>

</section>