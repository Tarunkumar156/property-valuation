@switch($type)
    @case('text')
        <div class="{{ $col }}">
            <label for="{{ $labelidname }}" class="form-label">{{ $labelname }}</label>
            @if ($required)
                <span class="text-danger fw-bold">*</span>
            @endif
            <input wire:model="{{ $fieldname }}" type="text" class="form-control" id="{{ $labelidname }}">
            @error($fieldname)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @break

    @case('select')
        <div class="{{ $col }}">
            {{-- @if ($labelname) --}}
            <label for="{{ $labelidname }}" class="form-label">{{ $labelname }}</label>
            {{-- @endif --}}
            @if ($required)
                <span class="text-danger fw-bold">*</span>
            @endif
            <select wire:model="{{ $fieldname }}" class="form-select" id="{{ $labelidname }}">
                <option value>{{ $default_option ? $default_option : 'Select a Option' }}</option>
                @foreach ($option as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
            @error($fieldname)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @break

    @case('textarea')
        <div class="{{ $col }}">
            @if ($labelname)
                <label for="{{ $labelidname }}" class="form-label">{{ $labelname }}</label>
            @endif
            @if ($required)
                <span class="text-danger fw-bold">*</span>
            @endif
            <textarea wire:model="{{ $fieldname }}" class="form-control" id="{{ $labelidname }}"
                rows="{{ isset($rows) ? $rows : 2 }}"></textarea>
            @error($fieldname)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @break

    @case('formswitch')
        <div class="{{ $col }}">
            <label for="{{ $labelidname }}" class="form-label">{{ $labelname }}</label>
            <div class="form-check form-switch">
                <input wire:model="{{ $fieldname }}" class="form-check-input border-primary" type="checkbox"
                    id="{{ $labelidname }}">
            </div>
            @error($fieldname)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @break

    @case('file')
        <div class="{{ $col }}">
            <label for="{{ $labelidname }}" class="form-label">{{ $labelname }}</label>
            @if ($required)
                <span class="text-danger fw-bold">*</span>
            @endif
            <input wire:model="{{ $fieldname }}" type="file" class="form-control" id="{{ $labelidname }}">
            @error($fieldname)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @break

    @case('password')
        <div class="{{ $col }}">
            <label for="{{ $labelidname }}" class="form-label">{{ $labelname }}</label>
            @if ($required)
                <span class="text-danger fw-bold">*</span>
            @endif
            <input wire:model="{{ $fieldname }}" type="password" class="form-control" id="{{ $labelidname }}">
            @error($fieldname)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    @break

    @default
        <span>Something went wrong, please try again</span>
@endswitch
