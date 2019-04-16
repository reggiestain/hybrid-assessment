@extends('layouts.app')
@section('content')
<table class='table table-hover'>
    <thead>
        <tr>
            <th>Name</th>  
            <th>Price</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
        <tr>
            <td>{{$item->name}}</td>   
            <td>{{$item->price}}</td>
            <td width="50px">
                {!! Form::open(['route'=>['cart.update',$item->rowId],'method'=>'PUT']) !!}
                <input style="margin-bottom:2px" type="text" name="qty" value="{{$item->qty}}">
                <input type="submit" class="btn btn-default btn-sm" value="Update">
                {!! Form::close() !!}
            </td>
            <td>
                <select name='size'>
                    <option value="2">Medium</option>
                    <option value="1">Small</option>                    
                    <option value="3">Large</option>
                    <option value="4">Extra Large</option>
                </select>    
            </td>
            <td>
                {!! Form::open(['route'=>['cart.destroy',$item->rowId],'method'=>'DELETE']) !!}
                <input type="submit" class="btn btn-danger btn-xs" value="Delete">
                {!! Form::close() !!}
            </td>
        </tr> 
        @endforeach
        <tr>                                                           
            <td style='font-size:16px;margin-left: 100px'><br><b>Items: <br> {{Cart::count()}}</td>
            <td></td>
            
            <td style='font-size:16px'><br><b>Grand Total:<br> R {{Cart::subtotal()}}</td>
            <td></td>
        </tr>
    </tbody>
</table>
@endsection