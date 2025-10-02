// src/components/site/NavBarClient.tsx
"use client";

import { useState } from "react";
import Link from "next/link";
import type { Locale, MenuDTO, MenuItem } from "@/lib/cms";

const API_BASE = (process.env.NEXT_PUBLIC_API ?? "").replace(/\/+$/, "");
const abs = (u?: string) =>
    !u ? "" : u.startsWith("http") ? u : `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;

function MenuTree({ items }: { items: MenuItem[] }) {
    return (
        <ul className="flex flex-col gap-1 md:flex-row md:items-center md:gap-4">
            {items.map((itm) => (
                <li key={itm.href} className="relative group">
                    <Link
                        href={itm.href}
                        className="block px-2 py-2 md:px-3 md:py-2 hover:opacity-80"
                    >
                        {itm.label}
                    </Link>

                    {itm.children?.length ? (
                        <div className="md:absolute md:left-0 md:top-full md:min-w-[220px] z-50 hidden md:block group-hover:block">
                            <ul className="rounded-lg border shadow-sm p-2 bg-white">
                                {itm.children.map((c) => (
                                    <li key={c.href}>
                                        <Link
                                            href={c.href}
                                            className="block whitespace-nowrap rounded-md px-3 py-2 hover:bg-gray-50"
                                        >
                                            {c.label}
                                        </Link>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    ) : null}
                </li>
            ))}
        </ul>
    );
}

export default function NavBarClient({
                                         data,
                                         locale,
                                     }: {
    data: MenuDTO;
    locale: Locale;
}) {
    const [open, setOpen] = useState(false);

    return (
        <header className="sticky top-0 z-40 bg-white/90 backdrop-blur border-b">
            <div className="container flex items-center justify-between py-2 md:py-3">
                {/* Brand */}
                <Link href={`/${locale}`} className="flex items-center gap-3">
                    {data.brandLogo ? (
                        // eslint-disable-next-line @next/next/no-img-element
                        <img
                            src={abs(data.brandLogo)}
                            alt={data.brand}
                            className="h-8 w-auto md:h-10"
                        />
                    ) : null}
                    <span className="text-sm md:text-base font-semibold">{data.brand}</span>
                </Link>

                {/* Desktop menu */}
                <nav className="hidden md:block">
                    <MenuTree items={data.items} />
                </nav>

                {/* Actions */}
                <div className="flex items-center gap-2">
                    {data.whatsappUrl ? (
                        <a
                            href={data.whatsappUrl}
                            target="_blank"
                            rel="noopener noreferrer"
                            className="hidden md:inline-flex rounded-full border px-3 py-1.5 text-sm hover:bg-gray-50"
                        >
                            WhatsApp
                        </a>
                    ) : null}

                    {/* Mobile toggle */}
                    <button
                        aria-label="Menüyü Aç/Kapat"
                        onClick={() => setOpen((v) => !v)}
                        className="md:hidden inline-flex items-center justify-center h-9 w-9 rounded-md border"
                    >
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" />
                        </svg>
                    </button>
                </div>
            </div>

            {/* Mobile menu */}
            {open && (
                <div className="md:hidden border-t">
                    <div className="container py-3">
                        <MenuTree items={data.items} />
                        {data.whatsappUrl ? (
                            <a
                                href={data.whatsappUrl}
                                target="_blank"
                                rel="noopener noreferrer"
                                className="mt-3 inline-flex rounded-full border px-3 py-1.5 text-sm hover:bg-gray-50"
                            >
                                WhatsApp
                            </a>
                        ) : null}
                    </div>
                </div>
            )}
        </header>
    );
}
