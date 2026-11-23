import { Pencil, Trash } from "lucide-react";
import { useState } from "react";
import { Link } from "react-router";

interface Participant {
    id: number;
    name: string;
    email: string;
    event: string;
}

export default function EventManagement() {
    const [participants, setParticipants] = useState<Participant[]>([
        { id: 1, name: "Andi", email: "andi@gmail.com", event: "Tech Conference" },
        { id: 2, name: "Budi", email: "budi@gmail.com", event: "UI/UX Workshop" },
        {
            id: 3,
            name: "Siti",
            email: "siti@gmail.com",
            event: "Digital Marketing",
        },
    ]);

    const [form, setForm] = useState({
        name: "",
        email: "",
        event: "",
    });

    const [editId, setEditId] = useState<number | null>(null);

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();

        if (editId !== null) {
            setParticipants(
                participants.map((p) => (p.id === editId ? { ...p, ...form } : p)),
            );
            setEditId(null);
        } else {
            setParticipants([...participants, { id: Date.now(), ...form }]);
        }

        setForm({ name: "", email: "", event: "" });
    };

    const handleEdit = (p: Participant) => {
        setForm({
            name: p.name,
            email: p.email,
            event: p.event,
        });
        setEditId(p.id);
    };

    const handleDelete = (id: number) => {
        setParticipants(participants.filter((p) => p.id !== id));
    };

    return (
        <div className="p-6">
            <h1 className="mb-5 text-2xl font-bold">Event Management</h1>

            <Link
                to="/create-event"
                className="bg-blue-600 px-4 py-2 text-white rounded-md  "
            >
                Create
            </Link>

            {/* Table */}
            <table className="w-full border-collapse border">
                <thead>
                    <tr className="bg-gray-100">
                        <th className="border p-3 bg-gray-700">No</th>
                        <th className="border p-3 bg-gray-700">Nama</th>
                        <th className="border p-3 bg-gray-700">Email</th>
                        <th className="border p-3 bg-gray-700">Event</th>
                        <th className="border p-3 bg-gray-700">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    {participants.map((p, index) => (
                        <tr key={p.id}>
                            <td className="border p-3 text-center">{index + 1}</td>
                            <td className="border p-3">{p.name}</td>
                            <td className="border p-3">{p.email}</td>
                            <td className="border p-3">{p.event}</td>
                            <td className="border p-3 text-center">
                                <div className="flex items-center justify-center gap-2">
                                    <button
                                        onClick={() => handleEdit(p)}
                                        className="bg-blue-500 p-2 text-white rounded-md"
                                    >
                                        <Pencil size={16} />
                                    </button>

                                    <button
                                        onClick={() => handleDelete(p.id)}
                                        className="p-2 bg-red-600 text-white rounded-md"
                                    >
                                        <Trash size={16} />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    );
}
