
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
            
          @foreach ($drugs as $drug)
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
 

