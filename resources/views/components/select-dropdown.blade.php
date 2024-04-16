<div class="">
    <select id="{{ $name }}" name="{{ $name }}" {{ $multiple ? 'multiple' : '' }} class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        <option class="text-gray-600" value="" disabled selected hidden>Please Select</option>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ in_array($value, $selected) ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>
