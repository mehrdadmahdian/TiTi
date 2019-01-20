<div id="modal-create" class="modal fade" style="display: none" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12"><h3 class="m-t-none m-b">افزودن حساب توییتر</h3>

                        <p>مشخصات حساب توییتر خود را در فرم زیر وارد نمایید:</p>

                        <form role="form" method="post" action="{{route('admin.twitter_accounts.store')}}">
                            @csrf
                            <div class="form-group"><label>عنوان حساب</label> <input name="name" type="text" placeholder="حساب شخضی من" class="form-control"></div>
                            <div class="form-group"><label>توضیحات</label> <input name="description" type="text" placeholder="این جمله صرفا یک جمله ی تستی است." class="form-control"></div>
                            <div class="form-group"><label>نام کاربری</label> <input name="username" type="text" placeholder="@mehrdian" class="form-control"></div>
                            <div>
                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>ثبت حساب کاربری</strong></button>
                                <label> <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember me </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>