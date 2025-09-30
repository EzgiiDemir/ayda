import { NextResponse } from "next/server";
export async function GET(req: Request) {
    const { searchParams } = new URL(req.url);
    const lang = searchParams.get("lang") ?? "tr";
    const tr = [
        { slug: "tedaviler/tupbebekivf", name: "Tüp Bebek (IVF) - ICSI" },
        { slug: "tedaviler/yumurtadonasyonu", name: "Yumurta Donasyonu" },
    ];
    const en = [
        { slug: "treatments/ivf-icsi", name: "IVF - ICSI" },
        { slug: "treatments/egg-donation", name: "Egg Donation" },
    ];
    return NextResponse.json(lang === "tr" ? tr : en);
}
