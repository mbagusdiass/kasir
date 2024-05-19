@props(['categories'])

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="productModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" name="productName" id="productName"
                            placeholder="Nama Produk" aria-describedby="productNameHelp" required>
                        <label for="productName">Products Name</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <select name="productCategoryId" class="form-select" aria-label="ProductCategory" required>
                            <option selected disabled>Select Categories</option>
                            @foreach ($categories as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        <label for="productCategoryId">Product Categories</label>
                    </div>
                    <div class="input-group mb-2">
                        <span class="input-group-text">@</span>
                        <input type="number" class="form-control" name="stock" id="stock"
                            placeholder="Stock Product" aria-describedby="stockHelp" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="productPrice" id="productPrice"
                            placeholder="Product Price" aria-describedby="productPriceHelp" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
            </div>
        </form>
    </div>
</div>
