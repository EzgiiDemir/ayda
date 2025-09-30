import { NextResponse } from "next/server";
const T = {
    tr: {
        "tedaviler/tupbebekivf": { title: "Tüp Bebek (IVF) - ICSI", html: "<p>Detay...</p>" },
    },
    en: {
        "treatments/ivf-icsi": { title: "IVF - ICSI", html: "<p>Detail...</p>" },
    },
} as const;

export async function GET(req: Request, ctx: { params: { slug: string } }) {
    const { searchParams } = new URL(req.url);
    const lang = searchParams.get("lang") ?? "tr";
    const key = decodeURIComponent(ctx.params.slug);
    const doc = (T as any)[lang]?.[key];
    if (!doc) return NextResponse.json({ message: "Not found" }, { status: 404 });
    return NextResponse.json({ slug: key, ...doc });
}
