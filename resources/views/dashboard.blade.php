<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md mb-7"
                     role="alert">
                    {{ session('success') }}
                </div>
            @endunless
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-3 text-2xl">
                        Welcome!
                    </div>

                    Use the form below to send a text.

                    <div class="mt-6 w-full md:max-w-2xl">
                        @unless ($errors->isEmpty())
                            <div
                                class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md mb-7"
                                role="alert">
                                There was a problem with your text message:

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endunless
                        <form action="{{ route('text-messages.store') }}" method="post">
                            @csrf

                            <div class="grid grid-cols-2 gap-5" style="grid-template-columns: 80px auto">
                                <label for="text-to-number" class="w-24">To</label>
                                <input type="tel" name="to" id="text-to-number" class="rounded" maxlength="12">

                                <label for="text-body" class="w-24">Message</label>
                                <textarea name="body" style="height: 80px" class="w-full rounded"
                                          id="text-body"></textarea>
                            </div>

                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                        class="bg-indigo-400 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
