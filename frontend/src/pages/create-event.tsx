export default function CreateEventPage() {
    return (
        <div>
            <div className="bg-gray-50 min-h-screen flex items-center justify-center rounded-md">
                <div className="flex flex-col items-center">
                    <div className="w-full max-w-sm bg-white border border-gray-300 p-10 rounded-md">
                        {/* field create event: Name, Description, Level */}
                        <form>
                            <div className="space-y-2">
                                <div className="flex flex-col">
                                    <label className="pr-15" htmlFor="">
                                        Name:
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Name Peserta"
                                        className="border border-black p-2 rounded-md"
                                    />
                                </div>
                                <div className="flex flex-col">
                                    <label className="pr-5" htmlFor="">
                                        Description:
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Description Peserta"
                                        className="border border-black p-2 rounded-md"
                                    />
                                </div>
                                <div className="flex flex-col">
                                    <label className="pr-5" htmlFor="">
                                        Start Date:
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Tanggal mulai"
                                        className="border border-black p-2 rounded-md"
                                    />
                                </div>
                                <div className="flex flex-col">
                                    <label className="pr-5" htmlFor="">
                                        End Date:
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Tanggal berakhir"
                                        className="border border-black p-2 rounded-md"
                                    />
                                </div>
                                { }
                                <div className="flex flex-col">
                                    <label className="pr-17" htmlFor="">
                                        Level:
                                    </label>
                                    <input
                                        type="text"
                                        placeholder="Level"
                                        className="border border-black p-2 rounded-md"
                                    />
                                </div>
                            </div>

                            <button
                                type="submit"
                                className="bg-blue-600 px-4 py-2 text-white rounded-md"
                            >
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}
