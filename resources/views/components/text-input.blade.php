@if ($type === 'textarea')
    <textarea name="{{ $name }}" id="{{ $name }}" cols="30" rows="15"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2">
        {{ old($name, $value) }}
    </textarea>
@else
    <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
        name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
        class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2" />
@endif
@error($name)
    <p class="mt-1 text-xs text-red-500">
        {{ $message }}
    </p>
@enderror
