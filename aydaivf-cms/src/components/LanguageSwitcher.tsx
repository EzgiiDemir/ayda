"use client";
import Link from "next/link";
import { usePathname } from "next/navigation";

const locales = ["tr","en"] as const;
type L = typeof locales[number];

export default function LanguageSwitcher({ locale }: { locale: L }) {
    const pathname = usePathname() || "/";
    const nextLocale: L = locale === "tr" ? "en" : "tr";
    const parts = pathname.split("/");
    parts[1] = nextLocale;
    const target = parts.join("/") || `/${nextLocale}`;
    return <Link href={target}>{locale === "tr" ? "English" : "Türkçe"}</Link>;
}
