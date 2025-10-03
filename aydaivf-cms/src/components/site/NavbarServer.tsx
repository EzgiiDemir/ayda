import { getMenu, type Locale } from "@/lib/cms";
import NavBarClient from "@/components/site/NavbarClient";

export default async function NavBarServer({ locale }: { locale: Locale }) {
    const data = await getMenu(locale);
    return <NavBarClient data={data} locale={locale} />;
}
