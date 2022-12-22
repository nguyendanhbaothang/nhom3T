<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5> <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Name User</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="name"
                            class="form-control filter-column f-name" value="{{ $f_name }}" />
                    </div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Số điện thoại</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="phone"
                            class="form-control filter-column f-name" value="{{ $f_phone }}" /></div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Địa chỉ</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="address"
                            class="form-control filter-column f-name" value="{{ $f_address }}" /></div>
                </div>
            </div>
            <div class="form-group form-row filter-row">
                <div class="col-lg-12">
                    <label class="">Chức vụ</label>
                </div>
                <div class="col-lg-12">
                    <div class="input text"><input type="text" name="position"
                            class="form-control filter-column f-name" value="{{ $f_position }}" /></div>
                </div>
            </div>


            </div>
            <div class="modal-footer"> <button type="submit" class="btn btn-secondary"
                    data-bs-dismiss="modal">Hủy</button> <button type="submit" class="btn btn-primary">Tìm kiếm</button></div>
        </div>
    </div>
</div>
