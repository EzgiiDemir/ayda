import type { ReactNode } from "react";
import Navbar from "@/components/Navbar";
import Footer from "@/components/Footer";
import "../globals.css";

export default async function LocaleLayout({
                                               children,
                                               params,
                                           }: {
    children: ReactNode;
    params: { locale: "tr" | "en" };
}) {
    const { locale } = params;

    return (
        <div className="min-h-dvh flex flex-col">
            <Navbar locale={locale} />
            <main className="flex-1">{children}</main>
            <Footer locale={locale} />
        </div>
    );
}
