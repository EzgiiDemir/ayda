import { NextResponse } from "next/server";
export async function GET(req: Request) {
    const lang = new URL(req.url).searchParams.get("lang") ?? "tr";
    const tr = {
        heroTitle: "Gelin size sahip olabileceğiniz\nen güzel hediyeyi verelim",
        intro: "Kuzey Kıbrıs Lefkoşa’nın merkezinde bulunan kliniğimiz...",
        featured: [
            { slug: "tedaviler/tupbebekivf", name: "Tüp Bebek (IVF) - ICSI" },
            { slug: "tedaviler/yumurtadonasyonu", name: "Yumurta Donasyonu" },
        ],
    };
    const en = {
        heroTitle: "Let us give you the most beautiful gift",
        intro: "Our clinic in the heart of Nicosia, Northern Cyprus...",
        featured: [
            { slug: "treatments/ivf-icsi", name: "IVF - ICSI" },
            { slug: "treatments/egg-donation", name: "Egg Donation" },
        ],
    };
    return NextResponse.json(lang === "tr" ? tr : en);
}
