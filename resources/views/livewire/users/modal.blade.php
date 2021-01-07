<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <form wire:submit.prevent='submit'>
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">{{ $editMode ? 'Edit' : 'Tambah' }} Pengguna </h6>
                </div>
                <div class="modal-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}.
                        </div>
                    @endif

                    <div class="row clearfix">
                        <div class="col-lg-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Nama Lengkap"><i
                                                    class="fa fa-user-o"></i></span>
                                        </div>
                                        <input wire:model.defer='name' type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Email"><i class="fa fa-at"></i></span>
                                        </div>
                                        <input wire:model.defer='email' type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Whatsapp"><i
                                                    class="fa fa-whatsapp"></i></span>
                                        </div>
                                        <input wire:model.defer='phone' type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Whatsapp">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="KTP / SIM"><i
                                                    class="fa fa-id-card-o"></i></span>
                                        </div>
                                        <input wire:model.defer='id_card' type="text"
                                            class="form-control @error('id_card') is-invalid @enderror"
                                            placeholder="KTP / SIM">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Tanggal Lahir"><i
                                                    class="fa fa-gift"></i></span>
                                        </div>
                                        <input type="date" wire:model.defer='dob'
                                            class="form-control @error('dob') is-invalid @enderror"
                                            placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Jenis Kelamin"><i
                                                    class="fa fa-intersex"></i></span>
                                        </div>
                                        <select wire:model.defer='gender_id'
                                            class="form-control @error('gender_id') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            @foreach ($selectGenders as $gender)
                                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Cabang"><i
                                                    class="fa fa-suitcase"></i></span>
                                        </div>
                                        <select wire:model.defer='company_id'
                                            class="form-control @error('company_id') is-invalid @enderror">
                                            <option value="">-- Pilih Cabang --</option>
                                            @foreach ($selectCompanies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Agama"><i
                                                    class="fa fa-sun-o"></i></span>
                                        </div>
                                        <select wire:model.defer='religion_id'
                                            class="form-control @error('religion_id') is-invalid @enderror">
                                            <option value="">-- Pilih Agama --</option>
                                            @foreach ($selectReligions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Status Pernikahan"><i
                                                    class="fa fa-address-book-o"></i></span>
                                        </div>
                                        <select wire:model.defer='marital_id'
                                            class="form-control @error('marital_id') is-invalid @enderror">
                                            <option value="">-- Pilih Status Pernikahan --</option>
                                            @foreach ($selectMaritals as $marital)
                                                <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Pendidikan"><i
                                                    class="fa fa-graduation-cap"></i></span>
                                        </div>
                                        <select wire:model.defer='education_id'
                                            class="form-control @error('education_id') is-invalid @enderror">
                                            <option value="">-- Pilih Pendidikan --</option>
                                            @foreach ($selectEducations as $education)
                                                <option value="{{ $education->id }}">{{ $education->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" title="Jabatan"><i
                                                    class="fa fa-black-tie"></i></span>
                                        </div>
                                        <select wire:model.defer='job_title_id'
                                            class="form-control @error('job_title_id') is-invalid @enderror">
                                            <option value="">-- Pilih Jabatan --</option>
                                            @foreach ($selectJobTitles as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        @if ($this->image && !$this->editMode)
                                            <img src="{{ $image->temporaryUrl() }}" alt="image" class=" w-50 h-50">
                                        @elseif($this->updated_image)
                                            <img src="{{ $updated_image->temporaryUrl() }}" alt="image"
                                                class=" w-50 h-50">
                                        @elseif($this->foto_preview)
                                            <img src="{{ $this->foto_preview }}" alt="image" class=" w-50 h-50">

                                        @else
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSVYFJoiQl5YPHK2xiOHeyplhJWUpFZT4m0vw&usqp=CAU"
                                                class="w-50 h-50">
                                        @endif
                                    </div>

                                    <label for="profileImage" style="cursor: pointer;" class="my-2">
                                        <span class="fa fa-upload"></span> Foto
                                    </label>
                                    @if ($this->editMode)
                                        <input wire:model="updated_image" type="file" id="profileImage"
                                            style="display: none;" accept="image/*">
                                    @else
                                        <input wire:model="image" type="file" id="profileImage" style="display: none;"
                                            accept="image/png">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    @foreach ($selectRoles as $role)
                                        <div class="custom-control custom-checkbox">
                                            <input wire:model="role_names" value="{{ $role->name }}" type="checkbox"
                                                class="custom-control-input" id="customCheck{{ $role->id }}">
                                            <label class="custom-control-label text-capitalize"
                                                for="customCheck{{ $role->id }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                    <small class="text-small text-muted">*note : abaikan jika bukan user aktif</small>
                                    @error('role_names')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="{{ !$this->show_password ? 'd-none' : '' }}">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" wire:model="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        <small
                                            class="text-small text-muted {{ !$this->editMode ? 'd-none' : '' }}">*note :
                                            abaikan jika tidak ada perubahan</small>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" wire:model="password_confirmation"
                                            id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{ $editMode ? 'Update' : 'Tambah' }}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
        </form>
    </div>
</div>
