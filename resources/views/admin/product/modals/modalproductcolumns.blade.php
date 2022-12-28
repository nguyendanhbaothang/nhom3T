<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tìm kiếm</h5> <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Tên sản phẩm</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="name"
                            class="form-control filter-column f-name" value="{{ $f_name }}" />
                    </div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Giá</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="price"
                            class="form-control filter-column f-name" value="{{ $f_price }}" /></div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Tìm theo ID</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="id"
                            class="form-control filter-column f-name" value="{{ $f_id }}" /></div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Thể loại</label>
                </div>
                <div class="col-lg-12">
                    <select name="category_id" id="" class="form-control">
                        <option value="">---Vui lòng chọn---</option>
                        @foreach ($f_categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                       </select>
                </div>
            </div>

            </div>
            <div class="modal-footer"> <button type="submit" class="btn btn-secondary"
                    data-bs-dismiss="modal">Quay lại</button> <button type="submit" class="btn btn-primary">Tìm </button></div>
        </div>
    </div>
</div>
