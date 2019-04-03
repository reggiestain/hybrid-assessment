
</div>    
<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" class="form-control" name='name' value="{{$product->name}}">
</div>
<div class="form-group">
    <label for="name">Product Description</label>
    <textarea class="form-control" name='description'>{{$product->description}}</textarea>
</div>
<div class="form-group">
<label for="name">Product Category</label>
    <select id="category" name="product_category_id" class="form-control">
        <option value="">--- Select category ---</option>
        @foreach ($Cat as $key => $value)
            <option value="{{ $key }}" {{ $product->product_category->id == $key ? 'selected' : ''}}>{{ $value }}</option>
        @endforeach
    </select>
</div>
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
        <label for="disc">Product Discount</label>
        <input type="number" class="form-control" name='discount' value="{{$product->discount}}">
    </div>
</div>