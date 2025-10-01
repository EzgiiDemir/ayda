"use client";
import Link from "next/link";
import { usePathname } from "next/navigation";

export default function LanguageSwitcher({ locale }: { locale: "tr" | "en" }) {
    const path = usePathname() || "/";
    const to = (loc: "tr" | "en") => path.replace(/^\/(tr|en)(\/|$)/, `/${loc}$2`);
    return (
        <div className="inline-flex items-center text-xs font-medium">
            <Link href={to("tr")} className={locale==="tr"?"text-black":"opacity-60 hover:opacity-80"}>TR</Link>
            <span className="px-1 opacity-30">|</span>
            <Link href={to("en")} className={locale==="en"?"text-black":"opacity-60 hover:opacity-80"}>EN</Link>
        </div>
    );
}
