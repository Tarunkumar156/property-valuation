<div class="col-md-10 mx-auto">
    <form wire:submit.prevent="store" class="p-5 border rounded-3 shadow-sm">
        <div class="form-floating mb-3">
            <input wire:model="companyfullname" type="text" class="form-control @error('email') is-invalid @enderror"
                placeholder="Company Fullname" id="floatingcompanyfullname" autofocus>
            <label for="floatingcompanyfullname">Company Fullname</label>
            @error('companyfullname')
                <span class="text-danger"> <strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input wire:model="companyshortname" type="text" class="form-control" id="floatingcompanyshortname"
                placeholder="Company Shortname">
            <label for="floatingcompanyshortname">Company Shortname</label>
            @error('companyshortname')
                <span class="text-danger"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input wire:model="phone" type="text" class="form-control" id="floatingphone" placeholder="Phone">
            <label for="floatingphone">Phone</label>
            @error('phone')
                <span class="text-danger"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input wire:model="email" type="text" class="form-control" id="floatingemail" placeholder="email">
            <label for="floatingemail">Email</label>
            @error('email')
                <span class="text-danger"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <textarea wire:model="address" class="form-control" placeholder="Address" id="floatingaddress"></textarea>
            <label for="floatingaddress">Address</label>
            @error('address')
                <span class="text-danger"><strong>{{ $message }}</strong></span>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <span wire:click="onclickformreset" class="btn btn-danger mx-2">Reset</span>
            <button type="submit" class="btn text-white theme_bg_color">Update</button>
        </div>
    </form>
</div>
