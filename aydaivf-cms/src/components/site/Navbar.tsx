// src/components/site/NavBar.tsx  (server wrapper)
import { getMenu, type Locale } from "@/lib/cms";
import NavBarClient from "./NavBarClient";

export default async function NavBar({ locale }: { locale: Locale }) {
    const data = await getMenu(locale);
    return <NavBarClient data={data} locale={locale} />;
}
