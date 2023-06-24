{{--isi props yang dilempar dari hal utama dataakademik di view--}}
@props(['panitia'])

<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14 bg-gray-50">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Data Panitia
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    No Identitas
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
            </tr>
            </thead>
            <tbody>
            {{--                show data disini--}}
            {{--                @php--}}
            {{--                    $counter = 1;--}}
            {{--                @endphp--}}
            {{--                @foreach ($akademik as $user)--}}
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    1
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                    2
                </th>
                <td class="px-6 py-4">
                    3
                </td>
                <td class="px-6 py-4">
                    4
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            {{--                @endforeach--}}
            </tbody>
        </table>
    </div>
</div>
