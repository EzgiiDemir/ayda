import { NextResponse } from "next/server";
const SLUGS = {
    tr: ["hakkimizda","seyahat","sss","iletisim","tedaviler/tupbebekivf","tedaviler/yumurtadonasyonu"],
    en: ["about","travel","faq","contact","treatments/ivf-icsi","treatments/egg-donation"],
} as const;

export async function GET(req: Request) {
    const lang = new URL(req.url).searchParams.get("lang") ?? "tr";
    return NextResponse.json((SLUGS as any)[lang] ?? []);
}
