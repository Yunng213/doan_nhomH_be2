@extends('admin_product.layout_home')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                        <a href="{{ url('/admin_product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                            Add New Product
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>product_name</th>
                                        <th>product_type</th>
                                        <th>product_quantity</th>
                                        <th>product_price</th>
                                        <th>product_detail</th>
                                        <th>product_image</th>
                                        <th>type_name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_product_admin as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{asset('img/'.$item->product_image)}}" alt="" with="100px" height="100px"></td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->product_type }}</td>
                                        <td>{{ $item->product_quantity }}</td>
                                        <td>{{ $item->product_price }}</td>
                                        <td>{{ $item->product_detail }}</td>
                                        <td>{{ $item->type_name }}</td>
  
                                        <td>
                                            <a href="{{ url('/product/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
  
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection