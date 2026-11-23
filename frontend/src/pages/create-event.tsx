import { zodResolver } from "@hookform/resolvers/zod";
import { File } from "lucide-react";
import { useForm } from "react-hook-form";
import { eventSchema, type EventForm } from "../schema/eventSchema";
import api from "../api/axios";

export default function CreateEventPage() {
    function CreateEvent() {
        const {
            register,
            handleSubmit,
            formState: { errors, isSubmitting },
        } = useForm<EventForm>({
            resolver: zodResolver(eventSchema),
            defaultValues: {
                name: "",
                description: "",
                startDate: "",
                endDate: "",
                price: 0,
                level: "1",
            },
        });

        const onSubmit = async (data: EventForm) => {
            try {
                const formData = new FormData();

                formData.append("name", data.name);
                formData.append("description", data.description);
                formData.append("startDate", data.startDate);
                formData.append("endDate", data.endDate);
                formData.append("poster", data.poster);
                formData.append("price", String(data.price));
                formData.append("level", data.level);

                await api.post("/events", formData);

                alert("Event berhasil dibuat!");
            } catch (error) {
                console.log(error);
                alert("Gagal membuat event!");
            }
        };

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
                                        <textarea
                                            placeholder="Description Peserta"
                                            className="border border-black p-2 rounded-md"
                                        />
                                    </div>
                                    <div className="flex flex-col">
                                        <label className="pr-5" htmlFor="">
                                            Start Date:
                                        </label>
                                        <input
                                            type="date"
                                            placeholder="Tanggal mulai"
                                            className="border border-black p-2 rounded-md"
                                        />
                                    </div>
                                    <div className="flex flex-col">
                                        <label className="pr-5" htmlFor="">
                                            End Date:
                                        </label>
                                        <input
                                            type="date"
                                            placeholder="Tanggal berakhir"
                                            className="border border-black p-2 rounded-md"
                                        />
                                    </div>
                                    <div className="flex flex-col">
                                        <label htmlFor="">Poster</label>
                                        <div className="flex items-center gap-2 border p-3 rounded-md">
                                            <File className="shrink-0" />
                                            <input type="file" accept="image/png" />
                                        </div>
                                    </div>
                                    <div className="flex flex-col">
                                        <label className="pr-17" htmlFor="">
                                            Price:
                                        </label>

                                        <input
                                            className="border border-black p-2 rounded-md"
                                            type="number"
                                        />
                                    </div>
                                    <div className="flex flex-col">
                                        <label className="pr-17" htmlFor="">
                                            Level:
                                        </label>
                                        <select className="border border-black p-2 rounded-md">
                                            <option value="1">SD</option>
                                            <option value="2">SMP</option>
                                            <option value="3">SMA / SEDERAJAT</option>
                                        </select>
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
