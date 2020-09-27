<div class="w-full block mt-8">
    <div class="flex flex-wrap sm:flex-no-wrap justify-between">
        <div class="w-full text-center border border-gray-300 px-8 py-6 theAdminPersons">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl thePersonColors">{{ sprintf("%02d", count($parents)) }}</span>
                <span class="thePersonColors">Parents</span>
            </h3>
        </div>
        <div class="w-full text-center border border-gray-300 px-8 py-6 mx-0 sm:mx-6 my-4 sm:my-0 theAdminPersons">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl thePersonColors">{{ sprintf("%02d", count($teachers)) }}</span>
                <span class="thePersonColors">Teachers</span>
            </h3>
        </div>
        <div class="w-full text-center border border-gray-300 px-8 py-6 theAdminPersons">
            <h3 class="text-gray-700 uppercase font-bold">
                <span class="text-4xl thePersonColors">{{ sprintf("%02d", count($students)) }}</span>
                <span class="thePersonColors">Students</span>
            </h3>
        </div>
    </div>
</div>