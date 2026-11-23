import { z } from "zod";

export const eventSchema = z
  .object({
    name: z.string().min(1, "Nama event wajib diisi"),

    description: z.string().min(1, "Deskripsi wajib diisi"),

    startDate: z.string().min(1, "Tanggal mulai wajib diisi"),

    endDate: z.string().min(1, "Tanggal berakhir wajib diisi"),

    poster: z
      .custom<File>((file) => file instanceof File, "Poster wajib diupload")
      .refine((file) => file.type === "image/png", "Poster harus PNG")
      .refine((file) => file.size <= 5 * 1024 * 1024, "Maksimal ukuran 5MB"),

    price: z.number().min(0, "Harga tidak boleh negatif"),

    level: z.enum(["1", "2", "3"]),
  })
  .refine((data) => data.endDate >= data.startDate, {
    message: "Tanggal berakhir harus setelah tanggal mulai",
    path: ["endDate"],
  });

export type EventForm = z.infer<typeof eventSchema>;
