import { NextResponse } from "next/server";
import type { NextRequest } from "next/server";

const locales = ["tr", "en"] as const;
const defaultLocale = "tr";

export function middleware(req: NextRequest) {
    const { pathname } = req.nextUrl;

    // Dahili yolları geç
    if (
        pathname.startsWith("/_next") ||
        pathname.startsWith("/api") ||
        pathname.startsWith("/favicon") ||
        pathname.startsWith("/images")
    ) return;

    // Zaten /tr veya /en ise geç
    const seg = pathname.split("/")[1];
    if (locales.includes(seg as any)) return;

    // Kök veya locale'siz yol → /tr/...
    const url = req.nextUrl.clone();
    url.pathname = `/${defaultLocale}${pathname}`;
    return NextResponse.redirect(url);
}
export const config = {
    matcher: ["/((?!_next|api|favicon\\.ico|images/|.*\\.(?:svg|png|jpg|jpeg|gif|webp|ico)).*)"],
};