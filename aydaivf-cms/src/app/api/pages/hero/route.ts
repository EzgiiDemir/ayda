import { NextResponse } from "next/server";

const HERO = {
    tr: {
        slides: [
            {
                backgrounds: [
                    "/images/dots.png",
                    "https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png",
                ],
                title: "En Güzel Hediyeyi Verelim",
                subtitle: "Gelin Size Sahip Olabileceğiniz",
            },
        ],
        workHours: "PTESİ - CUMA : 9:00 - 14:00",
        footer: "Ayda IVF Center",
    },
    en: {
        slides: [
            {
                backgrounds: [
                    "/images/dots.png",
                    "https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png",
                ],
                title: "Let Us Give You the Most Beautiful Gift",
                subtitle: "Come and Have the Chance",
            },
        ],
        workHours: "MON - FRI : 9:00 - 14:00",
        footer: "Ayda IVF Center",
    },
} as const;

export async function GET(req: Request) {
    const lang = new URL(req.url).searchParams.get("lang") ?? "tr";
    return NextResponse.json((HERO as any)[lang] ?? HERO.tr);
}
