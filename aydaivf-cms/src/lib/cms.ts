import { headers } from "next/headers";

export type Locale = "tr" | "en";

export type PageDTO = {
    slug: string;
    title: string;
    html?: string;
    sections?: { id: string; heading: string; text: string }[];
};

export type HomeDTO = {
    heroTitle: string;
    intro: string;
    featured: { slug: string; name: string }[];
};

export type MenuDTO = {
    brand: string;
    items: { href: string; label: string }[];
    treatments: { href: string; label: string }[];
};
const RAW = process.env.NEXT_PUBLIC_API ?? "";           // ör: http://localhost:8000/api  (SONDA /api VAR)
const API = RAW.replace(/\/+$/,"");                      // sondaki /’ları kırp
const REVALIDATE = Number(process.env.REVALIDATE_SECONDS ?? 60);

// API tabanı varsa onu kullan; yoksa same-origin + /api kullan
async function base(): Promise<string> {
    if (API) return API;                                   // ör: http://localhost:8000/api
    const h = await headers();
    const proto = h.get("x-forwarded-proto") ?? "http";
    const host = h.get("x-forwarded-host") ?? h.get("host") ?? `localhost:${process.env.PORT ?? "3000"}`;
    return `${proto}://${host}/api`;                       // same-origin fallback
}

async function url(p: string): Promise<string> {
    return `${await base()}${p.startsWith("/") ? p : `/${p}`}`;
}

async function asJson<T>(res: Response): Promise<T> {
    if (!res.ok) throw new Error(`API ${res.status}`);
    return res.json();
}

export async function getHome(locale: Locale): Promise<HomeDTO> {
    const res = await fetch(await url(`/pages/home?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<HomeDTO>(res);
}

export async function getPage(locale: Locale, slugPath: string): Promise<PageDTO | null> {
    const res = await fetch(await url(`/pages/${encodeURIComponent(slugPath)}?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    if (res.status === 404) return null;
    return asJson<PageDTO>(res);
}

export async function getAllSlugs(locale: Locale): Promise<string[]> {
    const res = await fetch(await url(`/slugs?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<string[]>(res);

}
export async function getMenu(locale: Locale): Promise<MenuDTO> {
    const res = await fetch(await url(`/menus/main?lang=${locale}`), { next: { revalidate: REVALIDATE } });
    return asJson<MenuDTO>(res);
}