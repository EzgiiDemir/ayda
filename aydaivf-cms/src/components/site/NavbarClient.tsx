// src/components/site/NavBarClient.tsx
"use client";

import { useMemo, useState } from "react";
import Link from "next/link";
import type { Locale, MenuDTO, MenuItem } from "@/lib/cms";
import { Phone, Menu as MenuIcon, X } from "lucide-react";
import LanguageSwitcher from "@/components/LanguageSwitcher";

/* Helpers */
const API_BASE = (process.env.NEXT_PUBLIC_API ?? process.env.NEXT_PUBLIC_API_URL ?? "").replace(/\/+$/, "");
const toAbs = (u?: string) =>
    !u ? "" : /^https?:|^data:/i.test(u) ? u : `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;
const isExternal = (href: string) => /^https?:\/\//i.test(href);
const isHash = (href: string) => href === "#" || href.startsWith("#");
const LOCALES = ["tr", "en"] as const;

/** HREF normalizer: ÇİFT /tr/ ÖNLE! */
function withLocale(locale: Locale, href: string) {
    if (!href) return `/${locale}`;
    if (isExternal(href) || isHash(href)) return href;

    // temizle
    const clean = href.replace(/^\/+/, "");

    // eğer zaten tr/ veya en/ ile başlıyorsa DOKUNMA
    if (/^(tr|en)(\/|$)/i.test(clean)) return `/${clean}`;

    // aksi halde locale prefixle
    return `/${locale}/${clean}`;
}

function phoneFromWa(wa?: string) {
    if (!wa) return "";
    try {
        const u = new URL(wa);
        return decodeURIComponent(u.pathname.replace("/", ""));
    } catch {
        return "";
    }
}

/* Desktop dropdown */
function DesktopItem({
                         item,
                         idx,
                         locale,
                         dropdownBgClass,
                     }: {
    item: MenuItem;
    idx: number;
    locale: Locale;
    dropdownBgClass: string;
}) {
    const hasChildren = (item.children ?? []).length > 0;

    if (!hasChildren) {
        const href = withLocale(locale, item.href);
        const cls = "hover:text-ayda-pink-dark transition-colors duration-300 ease-in";
        return (
            <li key={`d-${idx}`} className="list-none">
                {isExternal(href) || isHash(href) ? (
                    <a className={cls} href={href}>{item.label}</a>
                ) : (
                    <Link className={cls} href={href}>{item.label}</Link>
                )}
            </li>
        );
    }

    return (
        <li key={`d-${idx}`} className="hidden md:block cursor-pointer relative group z-30 list-none">
            <button className="hover:text-ayda-pink-dark transition-colors duration-300 ease-in w-fit">
                {item.label}
            </button>
            <div
                className={`opacity-0 invisible absolute top-[100%] ${dropdownBgClass} flex flex-col w-fit min-w-[200px] max-w-[400px] transition-opacity duration-300 ease-in group-hover:opacity-100 group-hover:visible`}
            >
                {(item.children ?? []).map((c, i) => {
                    const href = withLocale(locale, c.href);
                    const base =
                        "px-2 py-3 hover:text-ayda-pink-dark bg-ayda-gray-light transition-colors duration-300 ease-in w-full";
                    return isExternal(href) || isHash(href) ? (
                        <a key={`d-sub-${idx}-${i}`} className={base} href={href}>
                            {c.label}
                        </a>
                    ) : (
                        <Link key={`d-sub-${idx}-${i}`} className={base} href={href}>
                            {c.label}
                        </Link>
                    );
                })}
            </div>
        </li>
    );
}

/* Mobile accordion */
function MobileItem({
                        item,
                        idx,
                        locale,
                        onNavigate,
                    }: {
    item: MenuItem;
    idx: number;
    locale: Locale;
    onNavigate: () => void;
}) {
    const [open, setOpen] = useState(false);
    const hasChildren = (item.children ?? []).length > 0;

    if (!hasChildren) {
        const href = withLocale(locale, item.href);
        const cls = "hover:text-ayda-pink-dark transition-colors duration-300 ease-in";
        return (
            <li key={`m-${idx}`} className="list-none">
                {isExternal(href) || isHash(href) ? (
                    <a className={cls} href={href} onClick={onNavigate}>
                        {item.label}
                    </a>
                ) : (
                    <Link className={cls} href={href} onClick={onNavigate}>
                        {item.label}
                    </Link>
                )}
            </li>
        );
    }

    return (
        <li key={`m-${idx}`} className="list-none">
            <button
                className="hover:text-ayda-pink-dark transition-colors duration-300 ease-in w-fit"
                onClick={() => setOpen((v) => !v)}
                aria-expanded={open}
            >
                {item.label}
            </button>
            <div
                className={`${
                    open ? "opacity-100 h-auto" : "opacity-0 h-0"
                } bg-gray-200 overflow-hidden flex flex-col transition-all duration-300 ease-in`}
            >
                {(item.children ?? []).map((c, i) => {
                    const href = withLocale(locale, c.href);
                    return isExternal(href) || isHash(href) ? (
                        <a key={`m-sub-${idx}-${i}`} className="px-2 py-3" href={href} onClick={onNavigate}>
                            {c.label}
                        </a>
                    ) : (
                        <Link key={`m-sub-${idx}-${i}`} className="px-2 py-3" href={href} onClick={onNavigate}>
                            {c.label}
                        </Link>
                    );
                })}
            </div>
        </li>
    );
}

export default function NavBarClient({ data, locale }: { data: MenuDTO; locale: Locale }) {
    const [drawer, setDrawer] = useState(false);
    const numberText = useMemo(() => phoneFromWa(data.whatsappUrl), [data.whatsappUrl]);
    const items = Array.isArray(data.items) ? data.items : [];
    const dropdownBgClass = data.colors?.dropdownBg || "bg-gray-200";

    return (
        <nav className="sticky top-0 shadow-md bg-white/60 backdrop-blur-[30px] h-[80px] z-50 border-b-2 border-ayda-pink-light">
            <div className="container h-full flex items-center justify-between">
                {/* Brand */}
                <Link
                    href={`/${locale}`}
                    className="relative w-[125px] h-[65px] aydalogo transition-all ease-in duration-300"
                >
                    {/* eslint-disable-next-line @next/next/no-img-element */}
                    {data.brandLogo ? (
                        <img
                            alt="ayda-logo"
                            className="w-full h-full object-contain"
                            loading="eager"
                            src={toAbs(data.brandLogo)}
                        />
                    ) : null}
                </Link>

                {/* Desktop */}
                <div className="hidden md:flex items-center gap-6">
                    <ul className="flex items-center gap-6 text-ayda-black capitalize">
                        {items.map((itm, idx) => (
                            <DesktopItem
                                key={`desk-${idx}`}
                                item={itm}
                                idx={idx}
                                locale={locale}
                                dropdownBgClass={dropdownBgClass}
                            />
                        ))}
                    </ul>

                    {/* Phone + Language */}
                    <div className="flex items-center gap-2">
                        {data.whatsappUrl && (
                            <a
                                target="_blank"
                                rel="noopener noreferrer"
                                className="w-8 h-8 cursor-pointer rounded-md bg-ayda-pink-dark p-2 hover:bg-ayda-blue transition-colors duration-300 ease-in flex justify-center items-center my-2 md:my-4"
                                href={data.whatsappUrl}
                            >
                                <Phone className="text-white text-sm md:text-lg" />
                            </a>
                        )}
                        <LanguageSwitcher locale={locale} />
                    </div>
                </div>

                {/* Mobile toggles */}
                <div className="md:hidden flex items-center gap-2">
                    <LanguageSwitcher locale={locale} />
                    <button
                        aria-label="Menüyü Aç/Kapat"
                        onClick={() => setDrawer((v) => !v)}
                        className="flex md:hidden flex-col gap-[6px] w-fit cursor-pointer ml-2"
                    >
                        {drawer ? <X className="w-6 h-6 text-ayda-pink-dark" /> : <MenuIcon className="w-6 h-6 text-ayda-pink-dark" />}
                    </button>
                </div>
            </div>

            {/* Mobile drawer */}
            <div
                className={`z-50 bg-white absolute top-[80px] left-0 w-full h-[calc(100dvh-80px)] overflow-y-auto transition-transform duration-300 ease-in ${
                    drawer ? "translate-x-0" : "-translate-x-full"
                } flex flex-col py-4`}
            >
                <ul className="container flex flex-col gap-3 text-ayda-black capitalize">
                    {items.map((itm, idx) => (
                        <MobileItem key={`mob-${idx}`} item={itm} idx={idx} locale={locale} onNavigate={() => setDrawer(false)} />
                    ))}
                </ul>

                {/* WhatsApp (mobile bottom) */}
                {data.whatsappUrl && (
                    <a
                        target="_blank"
                        rel="noopener noreferrer"
                        className="w-[90%] mt-auto mx-auto cursor-pointer rounded-md bg-ayda-pink-dark p-2 hover:bg-ayda-blue transition-colors duration-300 ease-in flex justify-center items-center gap-2"
                        href={data.whatsappUrl}
                        onClick={() => setDrawer(false)}
                    >
                        <Phone className="text-white text-sm" />
                        <p className="text-white text-sm">{numberText || "+90..."}</p>
                    </a>
                )}
            </div>
        </nav>
    );
}
