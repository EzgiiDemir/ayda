import { NextResponse } from "next/server";

const DB = {
    tr: {
        "hakkimizda": { title: "Hakkımızda", html: "<p>Ayda IVF hakkında...</p>" },
        "seyahat": { title: "Seyahat", html: "<p>Transfer ve konaklama...</p>" },
        "sss": { title: "Sık Sorulan Sorular", html: "<p>...</p>" },
        "iletisim": { title: "İletişim", html: "<p>Adres ve telefon...</p>" },
        "tedaviler/tupbebekivf": { title: "Tüp Bebek (IVF) - ICSI", html: "<p>Detay...</p>" },
        "tedaviler/yumurtadonasyonu": { title: "Yumurta Donasyonu", html: "<p>Detay...</p>" },
    },
    en: {
        "about": { title: "About Us", html: "<p>About Ayda IVF...</p>" },
        "travel": { title: "Travel", html: "<p>Transfers & stay...</p>" },
        "faq": { title: "FAQ", html: "<p>...</p>" },
        "contact": { title: "Contact", html: "<p>Address and phone...</p>" },
        "treatments/ivf-icsi": { title: "IVF - ICSI", html: "<p>Detail...</p>" },
        "treatments/egg-donation": { title: "Egg Donation", html: "<p>Detail...</p>" },
    },
} as const;

export async function GET(req: Request, ctx: { params: { slug: string } }) {
    const lang = new URL(req.url).searchParams.get("lang") ?? "tr";
    const key = decodeURIComponent(ctx.params.slug);
    const doc = (DB as any)[lang]?.[key];
    if (!doc) return NextResponse.json({ message: "Not found" }, { status: 404 });
    return NextResponse.json({ slug: key, ...doc });
}
