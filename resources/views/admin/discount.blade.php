

<div class="form-group">
    <label for="price">Price</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">R</span>
        </div>
        {{ csrf_field() }}
        <input type="hidden" class="form-control" name='id' value="{{$product->id}}">
        <input type="text" class="form-control" name='price' value="{{$product->price}}">
    </div>
    <div class="form-group">
        <label for="pwd">Discount</label>
        <input type="number" class="form-control" name='discount' value="{{$product->discount}}">
    </div>
</div>