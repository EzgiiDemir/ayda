"use client";
import { useState } from "react";
import Link from "next/link";
import Image from "next/image";
import {Phone} from "lucide-react";

export default function NavbarClient({ menu, locale }: { menu: any; locale: string }) {
    const [mobileOpen, setMobileOpen] = useState(false);
    const [openDropdown, setOpenDropdown] = useState<string | null>(null);

    return (
        <nav className="sticky top-0 shadow-md bg-white/60 backdrop-blur-[30px] h-[80px] z-50 border-b-2 border-ayda-pink-light">
            <div className="container h-full flex items-center justify-between">
                {/* Brand */}
                <Link
                    href={`/${locale}`}
                    className="relative w-[125px] h-[65px] aydalogo transition-all ease-in duration-300"
                >
                    <Image
                        alt="ayda-logo"
                        src={menu.brandLogo}
                        fill
                        priority
                        className="w-full h-full object-contain"
                    />
                </Link>

                {/* Desktop Menü */}
                <div className="hidden md:flex items-center gap-6">
                    <ul className="flex items-center gap-6 text-ayda-black capitalize">
                        {menu.items.map((item: any) => (
                            <div key={item.label} className="cursor-pointer relative group z-30">
                                {item.children ? (
                                    <>
                                        <button
                                            className="hover:text-ayda-pink-dark transition-colors duration-300 ease-in w-fit"
                                            onClick={() =>
                                                setOpenDropdown(openDropdown === item.label ? null : item.label)
                                            }
                                        >
                                            {item.label}
                                        </button>
                                        <div
                                            className={`${
                                                openDropdown === item.label
                                                    ? "opacity-100 visible"
                                                    : "opacity-0 invisible"
                                            } absolute top-[100%] bg-[oklch(96.8%_0.007_247.896)] flex flex-col w-fit min-w-[200px] max-w-[400px] transition-opacity duration-300 ease-in`}
                                        >
                                            {item.children.map((child: any) => (
                                                <Link
                                                    key={child.href}
                                                    href={child.href}
                                                    className="px-2 py-3 hover:bg-ayda-pink-dark hover:text-ayda-white transition-colors duration-300 ease-in w-full"
                                                >
                                                    {child.label}
                                                </Link>
                                            ))}
                                        </div>
                                    </>
                                ) : (
                                    <Link
                                        href={item.href}
                                        className="hover:text-ayda-pink-dark transition-colors duration-300 ease-in"
                                    >
                                        {item.label}
                                    </Link>
                                )}
                            </div>
                        ))}
                    </ul>

                    {/* WhatsApp */}
                    <a
                        target="_blank"
                        href={menu.whatsappUrl}
                        className="w-8 h-8 cursor-pointer rounded-md bg-ayda-pink-dark p-2 hover:bg-ayda-blue transition-colors duration-300 ease-in flex justify-center items-center my-2 md:my-4"
                    >
                        <Phone color="#ffffff" />
                    </a>

                    {/* Language Switcher */}
                    <div className="flex gap-2 ml-2">
                        <Link
                            href="/tr"
                            className={`${
                                locale === "tr" ? "font-bold text-ayda-pink-dark" : ""
                            } transition-colors`}
                        >
                            TR
                        </Link>
                        <Link
                            href="/en"
                            className={`${
                                locale === "en" ? "font-bold text-ayda-pink-dark" : ""
                            } transition-colors`}
                        >
                            EN
                        </Link>
                    </div>
                </div>

                {/* Mobil Menü Butonu */}
                <div
                    className="md:hidden flex flex-col gap-[6px] w-fit cursor-pointer ml-6"
                    onClick={() => setMobileOpen(!mobileOpen)}
                >
                    <span className="h-[1.5px] w-6 bg-ayda-pink-dark rounded-md transition-all duration-300 ease-in-out"></span>
                    <span className="h-[1.5px] w-6 bg-ayda-pink-dark rounded-md transition-all duration-300 ease-in-out"></span>
                    <span className="h-[1.5px] w-6 bg-ayda-pink-dark rounded-md transition-all duration-300 ease-in-out"></span>
                </div>
            </div>

            {/* Mobil Menü */}
            <div
                className={`z-50 bg-white absolute top-[80px] left-0 w-full h-[calc(100dvh-80px)] overflow-y-auto transition-transform duration-300 ease-in ${
                    mobileOpen ? "translate-x-0" : "-translate-x-full"
                } flex flex-col py-4`}
            >
                <ul className="container flex flex-col gap-3 text-ayda-black capitalize">
                    {menu.items.map((item: any) => (
                        <div key={item.label} className="block md:hidden">
                            {item.children ? (
                                <>
                                    <button
                                        className="hover:text-ayda-pink-dark transition-colors duration-300 ease-in w-fit"
                                        onClick={() =>
                                            setOpenDropdown(openDropdown === item.label ? null : item.label)
                                        }
                                    >
                                        {item.label}
                                    </button>
                                    <div
                                        className={`${
                                            openDropdown === item.label ? "opacity-100 h-auto" : "opacity-0 h-0"
                                        } bg-[oklch(96.8%_0.007_247.896)] overflow-hidden flex flex-col transition-all duration-300 ease-in`}
                                    >
                                        {item.children.map((child: any) => (
                                            <Link
                                                key={child.href}
                                                href={child.href}
                                                className="px-2 py-3 hover:bg-ayda-pink-dark hover:text-ayda-white"
                                            >
                                                {child.label}
                                            </Link>
                                        ))}
                                    </div>
                                </>
                            ) : (
                                <Link
                                    href={item.href}
                                    className="hover:text-ayda-pink-dark transition-colors duration-300 ease-in"
                                >
                                    {item.label}
                                </Link>
                            )}
                        </div>
                    ))}
                </ul>

                {/* WhatsApp Mobil */}
                <a
                    target="_blank"
                    href={menu.whatsappUrl}
                    className="w-[90%] mt-auto mx-auto cursor-pointer rounded-md bg-ayda-pink-dark p-2 hover:bg-ayda-blue transition-colors duration-300 ease-in flex justify-center items-center gap-2"
                >
                    <Phone color="#ffffff" />
                    <p className="text-white text-sm">+905488252821</p>
                </a>
            </div>
        </nav>
    );
}
