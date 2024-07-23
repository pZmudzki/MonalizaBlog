@if ($type === 'textarea')
    <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2">{{ old($name, $value) }}</textarea>
@else
    <input type="{{ $type }}" placeholder="{{ $placeholder }}" name="{{ $name }}"
        value="{{ old($name, $value) }}" id="{{ $name }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2" />
@endif
@error($name)
    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
@enderror
